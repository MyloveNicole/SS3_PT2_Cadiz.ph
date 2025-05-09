<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: linear-gradient(to right, red, orange, yellow, green);
            background-size: 400% 400%; 
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.93);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            border-radius: 4px;
            display: block;
            position: relative; 
            animation: fadeIn 0.5s; 
            background: linear-gradient(45deg, rgb(230, 28, 28), #f7d94c, rgb(203, 42, 218), #6bcfdf, #6b6bff);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            color: white;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>BMI Calculator</h1>
    <form method="post" action="">
        <label for="weight">Weight (kg):</label>
        <input type="number" step="0.1" name="weight" id="weight" required>

        <label for="height">Height:</label>
        <input type="number" step="0.1" name="height" id="height" required>
        <select name="height_unit" id="height_unit">
            <option value="m">meters (m)</option>
            <option value="cm">centimeters (cm)</option>
        </select>

        <input type="submit" value="Calculate BMI">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $height_unit = $_POST['height_unit'];

        
        if ($height_unit == 'cm') {
            $height = $height / 100;
        }

        
        $bmi = $weight / ($height * $height);
        $category = '';
        $risk = '';

        
        if ($bmi < 18.5) {
            $category = "Underweight";
            $risk = "Increased risk of nutritional deficiency and osteoporosis.";
        } elseif ($bmi < 24.9) {
            $category = "Normal weight";
            $risk = "Average.";
        } elseif ($bmi < 29.9) {
            $category = "Overweight";
            $risk = "Mildly Increased.";
        } elseif ($bmi < 34.9) {
            $category = "Obesity (Class 1)";
            $risk = "Moderate.";
        } elseif ($bmi < 39.9) {
            $category = "Obesity (Class 2)";
            $risk = "Severe.";
        } else {
            $category = "Obesity (Class 3)";
            $risk = "Very Severe.";
        }

        
        echo "<div class='result'>";
        echo "<h2>Your BMI is: " . number_format($bmi, 2) . "</h2>";
        echo "<p>Category: " . $category . "</p>";
        echo "<p>Risk of comorbidities: " . $risk . "</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
