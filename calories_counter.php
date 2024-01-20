<?php
echo "Calories counter" . PHP_EOL . "Enter number of ingredients" . PHP_EOL;
$numberOfIngredients = readline(">>");
if ($numberOfIngredients < 1 || $numberOfIngredients >10)
{
    echo "Number of ingredients must be greatar than zero and equal or less than 10" . PHP_EOL;
}
else
{
    $ingredients = getIngredients($numberOfIngredients);
    echo "Total caloricity is " . calculateTotalCalories($ingredients) . " kilocalories" . PHP_EOL;
    foreach ($ingredients as $ingredient)
    {        
        $caloriesPercentage = (($ingredient['caloricity'] * $ingredient['weight']/100) / calculateTotalCalories($ingredients)) * 100;
        $caloriesPercentage= round($caloriesPercentage, 2);
        echo $ingredient['name'] . " " . $ingredient['caloricity'] . " kcal/100g " . ($ingredient['caloricity'] * $ingredient['weight']/100) .  " kcal " . $ingredient['weight'] . " g " . $caloriesPercentage . "% kcal" . PHP_EOL ;
    }

}

function getIngredients($numberOfIngredients){

for ($i = 1; $i<=$numberOfIngredients; $i++)
{
    echo "Enter $i ingredient name" . PHP_EOL;
    $ingredientName = (string)readline(">>");    
    echo "Enter $i ingredient caloricity per 100 g" . PHP_EOL;
    $caloricity = (int)readline(">>");
    echo "Enter $i ingredient weight" . PHP_EOL;
    $weight = (int)readline(">>");

    $ingredients[] = [
        'name' => $ingredientName,
        'caloricity' => $caloricity,
        'weight' => $weight,
    ];
}
return $ingredients;
}
function calculateTotalCalories($ingredients)
    {
        $totalCalories = 0;        
        foreach ($ingredients as $ingredient) {            
            $totalCalories += ($ingredient['caloricity'] * $ingredient['weight']/100);            
        }
        return $totalCalories;
    }





