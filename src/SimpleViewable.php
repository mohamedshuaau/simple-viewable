<?php

namespace Shuaau\SimpleViewable;

use Shuaau\SimpleViewable\Contracts\ViewableContract;

class SimpleViewable extends ViewableContract {

    /**
     * Simple view method
     * @param $model
     * @throws \Exception
     */
    public function view($model) {
        $this->serialize($model);
        $this->simpleView();
    }

    /**
     * Add Unique view method
     * @param $model
     * @throws \Exception
     */
    public function unique($model) {
        $this->serialize($model);
        $this->uniqueView();
    }

    /**
     * Add a view with a throttle
     * @param $model
     * @param $date
     * @throws \Exception
     */
    public function expires($model, $date) {
        $this->serialize($model);
        $this->expirationView($date);
    }

    /**
     * Count all the views for the model
     * @param $model
     * @return int
     * @throws \Exception
     */
    public function count($model): int {
        $this->serialize($model);
        return $this->countViews();
    }

    /**
     * View all the unique views for the model
     * @param $model
     * @return int
     * @throws \Exception
     */
    public function countUnique($model): int {
        $this->serialize($model);
        return $this->countUniqueViews();
    }

    /**
     * Counts the views from a starting date
     * @param $model
     * @param $from
     * @return int
     */
    public function countFrom($model, $from): int {
        $this->serialize($model);
        return $this->countViewsFromDate($from);
    }

    /**
     * Counts the unique views from a starting date
     * @param $model
     * @param $from
     * @return int
     */
    public function countUniqueFrom($model, $from): int {
        $this->serialize($model);
        return $this->countUniqueViewsFromDate($from);
    }

    /**
     * Counts views in between two dates
     * @param $model
     * @param $from
     * @param $to
     * @return int
     */
    public function countBetween($model, $from, $to): int {
        $this->serialize($model);
        return $this->countViewsBetweenDate($from, $to);
    }

    /**
     * Counts unique views in between two dates
     * @param $model
     * @param $from
     * @param $to
     * @return int
     */
    public function countUniqueBetween($model, $from, $to): int {
        $this->serialize($model);
        return $this->countUniqueViewsBetweenDate($from, $to);
    }

}
