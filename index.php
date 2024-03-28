<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Menyesuaikan warna teks */
        input[type="text"] {
            color: #333;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4 text-center">Kalkulator PHP</h2>
        <form method="post" action="" class="max-w-md mx-auto bg-purple-800 p-6 rounded-lg shadow-md">
        <div class="mb-4">
                <input type="text" name="angka1" id="angka1" placeholder="Masukkan angka pertama" required class="w-full px-4 py-2 rounded-md border border-gray-700 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <input type="text" name="angka2" id="angka2" placeholder="Masukkan angka kedua" required class="w-full px-4 py-2 rounded-md border border-gray-700 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4 grid grid-cols-4 gap-2">
                <button type="button" onclick="appendNumber('7')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">7</button>
                <button type="button" onclick="appendNumber('8')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">8</button>
                <button type="button" onclick="appendNumber('9')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">9</button>
                <button type="button" onclick="setOperator('/')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">/</button>
                <button type="button" onclick="appendNumber('4')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">4</button>
                <button type="button" onclick="appendNumber('5')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">5</button>
                <button type="button" onclick="appendNumber('6')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">6</button>
                <button type="button" onclick="setOperator('*')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">*</button>
                <button type="button" onclick="appendNumber('1')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">1</button>
                <button type="button" onclick="appendNumber('2')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">2</button>
                <button type="button" onclick="appendNumber('3')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">3</button>
                <button type="button" onclick="setOperator('-')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">-</button>
                <button type="button"  onclick="appendNumber('0')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer col-span-2">0</button>
                <button type="button" onclick="appendDecimal()" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">.</button>
                <button type="button" onclick="setOperator('+')" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-md cursor-pointer">+</button>
            </div>
            <div class="col-span-2">
                <button type="submit" name="hitung" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded-md cursor-pointer w-full">Hitung</button>
            </div>
        
            <input type="hidden" name="operator" id="operator">
        </form>
        <?php
        if(isset($_POST['hitung'])) {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operator = $_POST['operator'];
            $result = '';

            switch ($operator) {
                case '+':
                    $result = $angka1 + $angka2;
                    break;
                case '-':
                    $result = $angka1 - $angka2;
                    break;
                case '*':
                    $result = $angka1 * $angka2;
                    break;
                case '/':
                    if($angka2 == 0) {
                        $result = "Tidak bisa dibagi dengan 0";
                    } else {
                        $result = $angka1 / $angka2;
                    }
                    break;
                default:
                    $result = "Operasi tidak valid";
                    break;
            }

            echo "<h3 class='text-2xl mt-4 text-center'>Hasil: $result</h3>";
        }
        ?>
    </div>
    <script>
        function appendNumber(number) {
            var angka1 = document.getElementById("angka1");
            var angka2 = document.getElementById("angka2");
            if (angka1.value == "") {
                angka1.value = number;
            } else if (angka2.value == "") {
                angka2.value = number;
            }
        }

        function appendDecimal() {
            var angka1 = document.getElementById("angka1");
            var angka2 = document.getElementById("angka2");
            if (angka1.value == "") {
                angka1.value = "0.";
            } else if (angka2.value == "") {
                angka2.value = "0.";
            }
        }

        function setOperator(operator) {
            document.getElementById("operator").value = operator;
        }
    </script>
</body>
</html>
