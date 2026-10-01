<?php

    namespace Chry\EasyTools;

    use Random\Randomizer; //uses Randomizer tool from namespace Random
    use \Random\IntervalBoundary;

    class Tools{
        private static ?Randomizer $random = null; # ? tells php that $random is either a null or a Randomizer object

        public static function random_float(float $min, float $max, int $n = 6): float { //strict typing and retun type
        #Generate a random float number with ClosedOpen interval given min and max and the max number of decimal places, default = 6
        
            if(self::$random === null) {  //self is used when accessing class attributes or methods
                self::$random = new Randomizer();
            }
            
            $result = self::$random->getFloat($min, $max, IntervalBoundary::ClosedOpen);

            return round($result, $n, PHP_ROUND_HALF_UP); //ceil rounds
        }

        public static function generate_prices(array &$vector_prices, int $count_generate, float $min, float $max): void {
        #Generates an array of random prices with 2 decimal places and appends each element into an existing array
        
            $array_random = [];

            for ($i = 0; $i < $count_generate; $i++){
                    $array_random[] = self::random_float($min, $max, 2);
            }
            
            array_push($vector_prices, ...$array_random); # ... operator is used to deserialize an array
        }

        public static function average_from_min (array $array, float $min): ?float {
        #Returns the average value of all the indexes of an array that are higher than a chosen threshold

            $element_count = 0;
            $sum_prices = 0;

            foreach ($array as $float_value) {
                if($float_value > $min){
                    $element_count++;
                    $sum_prices += $float_value;
                }       
            }

            if($element_count > 0){
                return  $sum_prices / $element_count;
            } else{
                return null;
            }
        }

        public static function average (array $array): ?float {
        #Returns the average value in all the positions of an array

            if(count($array) > 0){
                return  array_sum($array) / count($array);
            } else{
                return null;
            }
        }

        public static function format_float(float $value, int $n) : string {
        #Formats decimal numbers to always have n decimal places (1.2 -> 1.20) but returns a string not a float (no math operations)

            return number_format($value, $n, '.', '');
            
        }

    }
    
?>
