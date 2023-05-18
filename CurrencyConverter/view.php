<?php
require_once('model.php');
class ConverterViews{
    private $model;
    public function __construct()
    {
        $this->model = new ConverterModel();
    }

    public function output(){
        $amount = 0;
        $inputCurency = "";
        $outputCurrency = "";
        if(isset($_POST['convert'])){
            $amount = $_POST['amount'];
            $inputCurrency = $_POST['input_currency'];
            $outputCurrency = $_POST['output_currency'];
        }
        $this->model->setCurrency($amount, $inputCurrency);
        $result = $this->model->getCurrency($outputCurrency);
        //echo $result;
        
        $view = "";
        $view .= "<table>
        <form method=\"POST\" action=\"controller.php\">
        <tr>
        <td>Input currency</td>
        <td>
        <select name=\"input_currency\">";
        foreach($this->model->getRates() as $key => $value){
            $view .= "<option value='$key'>$key</option>";
        }
        $view .= "</select>
        </td>
        </tr>
        <tr>
        <td>Amount: </td>
        <td><input type=\"text\" name=\"amount\"></td>
        </tr>
        <tr>
        <td>Output currency</td>
        <td>
        <select name=\"output_currency\">";
        foreach($this->model->getRates() as $key => $value){
            $view .= "<option value='$key'>$key</option>";
        }
        $view .= "</select>
        </td>
        </tr>
        
        <tr>
        <td><input type=\"submit\" value=\"Convert\" name=\"convert\"></td>
        </tr>
        <tr>
        <td>$amount $inputCurrency converted to $result $outputCurrency</td>
        
        </tr>
        </form>
        </table>";
        
        
        return $view;
    }
}