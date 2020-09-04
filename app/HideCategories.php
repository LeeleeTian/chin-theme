<?php

class HideCategories
{
    public static function init()
    {
        add_filter('manage_edit-true_case_study_tax_columns', [__CLASS__, 'removeCategoryDescription']);

    }

    public static function removeCategoryDescription($columns)
    {
        if (!isset($_GET['taxonomy']) || ($_GET['taxonomy'] != 'category' && $_GET['taxonomy'] != 'true_case_study_tax')) {
            return $columns;
        }

        if (isset($columns['description'])) {
            unset($columns['description']);
        }

        return $columns;
    }
}

HideCategories::init();
