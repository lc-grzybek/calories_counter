<?php
echo "Calories counter" . PHP_EOL;
 do {
   echo "Enter number of ingredients" . PHP_EOL;
$numberOfIngredients = (int)readline(">>");
if ($numberOfIngredients < 1 || $numberOfIngredients >10)
{
    echo "Number of ingredients must be a number greater than zero and equal or less than 10" . PHP_EOL;
}
 }
 while ($numberOfIngredients < 1 || $numberOfIngredients >10);

    $ingredients = getIngredients($numberOfIngredients);
    $totalCalories = calculateTotalCalories($ingredients);
    echo "Total caloricity is " . $totalCalories . " kilocalories" . PHP_EOL;
    foreach ($ingredients as $ingredient)
    {   
        [
            'caloricity' => $caloricity,
            'weight' => $weight,
            'name' => $name,
        ] = $ingredient;
        $calc = $ingredient['caloricity'] * $ingredient['weight']/100;
        $caloriesPercentage = ($calc / $totalCalories) * 100;
        $caloriesPercentage= round($caloriesPercentage);        
        echo "$name $caloricity kcal/100g $calc kcal $weight g  $caloriesPercentage % kcal" . PHP_EOL ;
    }

function getIngredients($numberOfIngredients){
$ingredients = [];
for ($i = 1; $i<=$numberOfIngredients; $i++)
{
    echo "Enter $i ingredient name" . PHP_EOL;
    $ingredientName = (string)readline(">>"); 

    do {
        echo "Enter $i ingredient caloricity per 100 g" . PHP_EOL;
        $caloricity = readline(">>");
        
        if (!is_numeric($caloricity)||$caloricity>900||$caloricity<=0) {
            echo "Wrong value. Try again" . PHP_EOL;
        }
    } while (!is_numeric($caloricity)||$caloricity>900||$caloricity<=0);

    do {
        echo "Enter $i ingredient weight" . PHP_EOL;
        $weight = readline(">>");
        
        if (!is_numeric($weight)||$weight<=0) {
            echo "Wrong value. Try again" . PHP_EOL;
        }
    } while (!is_numeric($weight)||$weight<=0);
    

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





