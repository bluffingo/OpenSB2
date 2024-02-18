<?php
// Copyright Bluffingo 2024, all rights reserved.

class FrontendTwigExtension extends \Twig\Extension\AbstractExtension
{
    //public function getFunctions()
    //{
    //}

    public function getFilters()
    {
        return [
            new \Twig\TwigFilter('parse_md_read_only', function ($text) {
                return "Fuck you";
            }, ['is_safe' => ['html']]),

            new \Twig\TwigFilter('parse_md_user_written', function ($text) {
                return "Fuck you";
            }, ['is_safe' => ['html']]),
        ];
    }
}