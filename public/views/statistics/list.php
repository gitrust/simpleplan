<div class="row">
<div class="twelve columns">
    <table class="stripe">
    <?php
        if (!sizeof($data['statistics'])) {
            echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
        }
        else {
            echo '<thead><tr>';
            echo '<th>' . I18n::tr('table.header.key') . '</th>';
            echo '<th colspan="1">' . I18n::tr('table.header.value') . '</th>';
            echo '</tr></thead>';
            echo '<tbody>';

            foreach ($data['statistics'] as $key => $value) {
                echo '<tr>';                
                echo '<td>' . htmlspecialchars($key) .'</td>';
                echo '<td>' . htmlspecialchars($value) .'</td>';           
                echo '</tr>';
            }
            echo '</tbody>';
        }
    ?>
    </table>
</div>
</div>