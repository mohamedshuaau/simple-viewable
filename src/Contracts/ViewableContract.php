<?php

namespace Shuaau\SimpleViewable\Contracts;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Shuaau\SimpleViewable\Exceptions\CouldNotSerializeException;
use Shuaau\SimpleViewable\Models\Viewable;

class ViewableContract {

    /**
     * @var $model
     */
    public $model;

    /**
     * Add views without unique method
     * @return $this
     */
    protected function simpleView() {
        $viewable = new Viewable(['session_id' => $this->getSessionId()]);
        $this->model->views()->save($viewable);
        return $this;
    }

    /**
     * Adds a unique view
     * @return $this
     */
    protected function uniqueView() {
        if (!$this->viewExists()){
            $viewable = new Viewable(['session_id' => $this->getSessionId()]);
            $this->model->views()->save($viewable);
        }
        return $this;
    }

    /**
     * Adds a unique view which is unique to session id and expiration date
     * @param $date
     * @return $this
     */
    protected function expirationView($date) {
        $parse_date = Carbon::parse($date)->format('Y-m-d H:i:s');
        if (!$this->hasExpired()){
            $viewable = new Viewable(['session_id' => $this->getSessionId(), 'expiration_date' => $parse_date]);
            $this->model->views()->save($viewable);
        }
        return $this;
    }

    /**
     * Get all the view counts for the current model
     * @return int
     */
    protected function countViews(): int {
        return $this->model->views()->count();
    }

    /**
     * Get the count of unique views for the current model
     * @return int
     */
    protected function countUniqueViews(): int {
        return $this->model->views()->distinct('session_id')->count();
    }

    /**
     * Counts views from a starting date
     * @param $from
     * @return int
     */
    protected function countViewsFromDate($from): int {
        return $this->model->views()->whereDate('created_at', '>', $from)->count();
    }

    /**
     * Counts unique views from a starting date
     * @param $from
     * @return int
     */
    protected function countUniqueViewsFromDate($from): int {
        return $this->model->views()->distinct('session_id')->whereDate('created_at', '>', $from)->count();
    }

    /**
     * Counts views between two dates
     * @param $from
     * @param $to
     * @return int
     */
    protected function countViewsBetweenDate($from, $to): int {
        return $this->model->views()->whereBetween('created_at', [$from, $to])->count();
    }

    /**
     * Counts unique views between two dates
     * @param $from
     * @param $to
     * @return int
     */
    protected function countUniqueViewsBetweenDate($from, $to): int {
        return $this->model->views()->distinct('session_id')->whereBetween('created_at', [$from, $to])->count();
    }

    /**
     * Check if the view with the session id has expired or not
     * @return bool
     */
    private function hasExpired(): bool {
        $viewable = Viewable::where('session_id', $this->getSessionId())
            ->where('expiration_date', '>', Carbon::now())
            ->count();
        return $viewable > 0;
    }

    /**
     * Gets the current session id
     * @return string
     */
    private function getSessionId(): string {
        return Session::getId();
    }

    /**
     * Serializes data
     * @param object $model
     */
    protected function serialize(object $model) {
        $this->model = $model;
    }

    /**
     * Checks if a view exists with the current session id
     * @return bool
     */
    private function viewExists(): bool {
        return Viewable::where('session_id', $this->getSessionId())->exists();
    }

}
