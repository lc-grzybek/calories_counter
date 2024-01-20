<?php
echo "Calories counter" . PHP_EOL . "Enter number of ingredients" . PHP_EOL;
$numberOfIngredients = (int)readline(">>");
if ($numberOfIngredients < 1 || $numberOfIngredients >10)
{
    echo "Number of ingredients must be greatar than zero and equal or less than 10" . PHP_EOL;
}
else
{
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

        $caloriesPercentage = (($ingredient['caloricity'] * $ingredient['weight']/100) / $totalCalories) * 100;
        $caloriesPercentage= round($caloriesPercentage);
        $calc = $ingredient['caloricity'] * $ingredient['weight']/100;
        echo "$name $caloricity kcal/100g $calc kcal $weight g  $caloriesPercentage % kcal" . PHP_EOL ;
    }

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
        
        if (!is_numeric($caloricity)) {
            echo "Wrong value. Try again" . PHP_EOL;
        }
    } while (!is_numeric($caloricity));

    do {
        echo "Enter $i ingredient weight" . PHP_EOL;
        $weight = readline(">>");
        
        if (!is_numeric($weight)) {
            echo "Wrong value. Try again" . PHP_EOL;
        }
    } while (!is_numeric($weight));
    

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





