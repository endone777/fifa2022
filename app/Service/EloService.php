<?php

namespace App\Service;

use JetBrains\PhpStorm\ArrayShape;

class EloService
{
    const KFACTOR = 16;

    const WIN = 1;
    const DRAW = 0.5;
    const LOST = 0;

    /**
     * Protected & private variables.
     */
    protected float $_ratingA;
    protected float $_ratingB;

    protected float $_scoreA;
    protected float $_scoreB;

    protected float $_expectedA;
    protected float $_expectedB;

    protected float $_newRatingA;
    protected float $_newRatingB;

    public function  __construct($ratingA,$ratingB,$scoreA,$scoreB)
    {
        $this->setNewSettings($ratingA, $ratingB, $scoreA, $scoreB);
    }

    public function setNewSettings($ratingA,$ratingB,$scoreA,$scoreB)
    {
        $this -> _ratingA = $ratingA;
        $this -> _ratingB = $ratingB;
        $this -> _scoreA = $scoreA;
        $this -> _scoreB = $scoreB;

        $expectedScores = $this -> _getExpectedScores($this -> _ratingA,$this -> _ratingB);
        $this -> _expectedA = $expectedScores['a'];
        $this -> _expectedB = $expectedScores['b'];

        $newRatings = $this ->_getNewRatings($this -> _ratingA, $this -> _ratingB, $this -> _expectedA, $this -> _expectedB, $this -> _scoreA, $this -> _scoreB);
        $this -> _newRatingA = $newRatings['a'];
        $this -> _newRatingB = $newRatings['b'];

        return $this;
    }

    public function getEloTeam1(): float
    {
        return $this->_newRatingA;
    }

    public function getEloTeam2(): float
    {
        return $this->_newRatingB;
    }

    #[ArrayShape(['a' => "float|int", 'b' => "float|int"])]
    protected function _getExpectedScores(int $ratingA, int $ratingB): array
    {
        $expectedScoreA = 1 / ( 1 + ( pow( 10 , ( $ratingB - $ratingA ) / 400 ) ) );
        $expectedScoreB = 1 / ( 1 + ( pow( 10 , ( $ratingA - $ratingB ) / 400 ) ) );

        return array (
            'a' => $expectedScoreA,
            'b' => $expectedScoreB
        );
    }

    #[ArrayShape(['a' => "float|int", 'b' => "float|int"])]
    protected function _getNewRatings($ratingA, $ratingB, $expectedA, $expectedB, $scoreA, $scoreB): ?array
    {
        $newRatingA = $ratingA + ( self::KFACTOR * ( $scoreA - $expectedA ) );
        $newRatingB = $ratingB + ( self::KFACTOR * ( $scoreB - $expectedB ) );

        return array (
            'a' => $newRatingA,
            'b' => $newRatingB
        );
    }
}
