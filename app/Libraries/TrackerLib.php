<?php

namespace App\Libraries;

use \Cache;
use DB;

class TrackerLib
{
    public static function getCategoryString($id)
    {
        if(!Cache::has('tracker_categories'))
        {
            $categories = DB::table('bt_categories')->where('group', '0')->get();
            Cache::forever('tracker_categories', $categories);
        }

        $categories = Cache::get('tracker_categories');
        foreach($categories as $category)
        {
            if($category->id == $id)
                return $category->name;
        }

        return "";
    }

    public static function getSubCategoryString($id)
    {
        if(!Cache::has('tracker_subcategories'))
        {
            $categories = DB::table('bt_categories')->where('group', '>', '0')->get();
            Cache::forever('tracker_subcategories', $categories);
        }

        $categories = Cache::get('tracker_subcategories');
        foreach($categories as $category)
        {
            if($category->id == $id)
                return $category->name;
        }

        return "";
    }

    public static function getStatusString($id)
    {
        if(!Cache::has('tracker_status'))
        {
            $status = DB::table('bt_status')->get();
            Cache::forever('tracker_status', $status);
        }

        $status = Cache::get('tracker_status');
        foreach($status as $state)
        {
            if($state->id == $id)
                return $state->status;
        }

        return "";
    }

    public static function getStatusColor($id)
    {
        if(!Cache::has('tracker_status'))
        {
            $status = DB::table('bt_status')->get();
            Cache::forever('tracker_status', $status);
        }

        $status = Cache::get('tracker_status');
        foreach($status as $state)
        {
            if($state->id == $id)
                return $state->color;
        }

        return "";
    }

    public static function getPriorityString($id)
    {
        if(!Cache::has('tracker_prio'))
        {
            $priorities = DB::table('bt_priority')->get();
            Cache::forever('tracker_prio', $priorities);
        }

        $priorities = Cache::get('tracker_prio');
        foreach($priorities as $priority)
        {
            if($priority->id == $id)
                return $priority->priority;
        }

        return "";
    }

    public static function getTotalIssues()
    {
        return (string)DB::table('bt_issues')->count();
    }

    public static function getTotalIssuesResolved()
    {
        return (string)DB::table('bt_issues')->where('status', '3')->orWhere('status', '4')->orWhere('status', '6')->count();
    }

    public static function getIssueTime($datetime)
    {
        $time = time() - strtotime($datetime);

        if($years = floor($time / 31536000))
        {
            $timestr = (string)$years;

            if($years > 1)
                $timestr = $timestr . " years ago";
            else
                $timestr = $timestr . " year ago";

            return (string)$timestr;
        }
        if($months = floor($time / 2592000))
        {
            $timestr = (string)$months;

            if($months > 1)
                $timestr = $months . " months ago";
            else
                $timestr = $months . " month ago";

            return (string)$timestr;
        }
        if($days = floor($time / 86400))
        {
            $timestr = (string)$days;

            if($days > 1)
                $timestr = $days . " days ago";
            else
                $timestr = $days . " day ago";

            return (string)$timestr;
        }
        if($hours = floor($time / 3600))
        {
            $timestr = (string)$hours;

            if($hours > 1)
                $timestr = $hours . " hours ago";
            else
                $timestr = $hours . " hour ago";

            return (string)$timestr;
        }
        if($minutes = floor($time / 60))
        {
            $timestr = (string)$minutes;

            if($minutes > 1)
                $timestr = $minutes . " minutes ago";
            else
                $timestr = $minutes . " minute ago";

            return (string)$timestr;
        }
        if($seconds = floor($time / 1))
        {
            $timestr = (string)$seconds;

            if($seconds > 1)
                $timestr = $seconds . " seconds ago";
            else
                $timestr = $seconds . " second ago";

            return (string)$timestr;
        }

        return (string)$time;
    }
}