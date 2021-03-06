<?php

declare(strict_types=1);

namespace App\Http\Presenters\Movie;

use App\Models\Movie;
use Illuminate\Support\Collection;

class MovieAsArrayPresenter
{
    public function present(Movie $movie): array
    {
        (array)$arrayMovie = [
            'id' => $movie->getId(),
            'name' => $movie->getName(),
            'description' => $movie->getDescription(),
            'releaseDate' => $movie->getReleaseDate(),
            'isLiked' => $movie->getIsLiked(),
        ];

        return $arrayMovie;
    }

    public function presentCollection(Collection $collection): array
    {
        return $collection
            ->map(
                fn (Movie $movie) => $this->present($movie)
            )
            ->all();
    }
}
