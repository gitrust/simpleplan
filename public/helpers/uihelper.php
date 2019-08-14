<?php

class UiHelper {

    public static function deleteIcon() {
        return '<i title="' . I18n::tr('icon.title.delete') . '" class="far fa-trash-alt">';
    }

    public static function plusIcon() {
        return '<i title="' . I18n::tr('icon.title.add') . '" class="fas fa-plus"></i>';
    }

    public static function leftIcon() {
        return '<i title="' . I18n::tr('icon.title.back') . '" class="fas fa-arrow-left"></i>';
    }

    public static function rightIcon() {
        return '<i title="' . I18n::tr('icon.title.forward') . '" class="fas fa-arrow-right"></i>';
    }

    public static function activateIcon() {
        return '<i title="' . I18n::tr('icon.title.activate') . '" class="far fa-check-circle"></i>';
    }

    public static function deactivateIcon() {
        return '<i title="' . I18n::tr('icon.title.deactivate') . '" class="far fa-stop-circle"></i>';
    }

    public static function externalLinkIcon() {
        return '<i class="fas fa-external-link-alt"></i>';
    }

    public static function pdfIcon() {
        return '<i title="' . I18n::tr('icon.title.pdf') . '" class="far fa-file-pdf"></i>';
    }

    public static function formatDate($d) {
        if (is_null($d)) {
            return '--';
        }
        // format mysql date to php date with strtotime()
        return date('d.m.Y',strtotime($d));
    }
}