<?php
// Copyright Chaziz and Bittoco 2024, all rights reserved.

namespace Qobo\Framework;

use Qobo\Framework\DateUtilities;
use Parsedown;

class FrontendTwigExtension extends \Twig\Extension\AbstractExtension
{
    private $date;

    public function __construct() {
        $this->date = new DateUtilities();
    }

    //public function getFunctions()
    //{
    //}

    public function getFilters()
    {
        return [
            new \Twig\TwigFilter('parse_md_read_only', function ($text) {
                $parsedown = new Parsedown();
                return $parsedown->text($text);
            }, ['is_safe' => ['html']]),

            new \Twig\TwigFilter('parse_md_user_written', function ($text) {
                return "CURRENTLY UNFINISHED! (parse_md_user_written)";
            }, ['is_safe' => ['html']]),

            new \Twig\TwigFilter('qobo_date', function ($date, $parameters) {
                $qobo_date = $this->date->actualTimeToQoboTime($date);
                return date($parameters, $qobo_date);
            }, ['is_safe' => ['html']]),
        ];
    }
}