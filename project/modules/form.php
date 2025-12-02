<?php
class Form {
    private $fields = [];
    private $action;
    private $submit;
    private $method;

    public function __construct($action, $submit, $method='POST') {
        $this->action = $action;
        $this->submit = $submit;
        $this->method = $method;
    }
    
    public function addField($name, $label, $type='text', $value='') {
        $this->fields[] = compact('name','label','type','value');
    }

    public function render() {
        echo "<form action='{$this->action}' method='{$this->method}' enctype='multipart/form-data'>";
        echo "<table>";

        foreach ($this->fields as $f) {
            echo "<tr><td style='padding:5px'>{$f['label']}</td><td>";

            // TEXTAREA
            if ($f['type'] === 'textarea') {
                echo "<textarea name='{$f['name']}' rows='4' cols='30'>{$f['value']}</textarea>";
            }

            // SELECT (Dropdown)
            elseif ($f['type'] === 'select') {
                echo "<select name='{$f['name']}'>";
                echo "<option value=''>-- Pilih --</option>";
                foreach ($f['value'] as $opt) {
                    echo "<option value='$opt'>$opt</option>";
                }
                echo "</select>";
            }

            // FILE
            elseif ($f['type'] === 'file') {
                echo "<input type='file' name='{$f['name']}'>";
            }
            else {
                echo "<input type='{$f['type']}' name='{$f['name']}' value='{$f['value']}'>";
            }

            echo "</td></tr>";
        }

        echo "<tr><td></td><td><button type='submit'>{$this->submit}</button></td></tr>";
        echo "</table></form>";
    }
}
?>
