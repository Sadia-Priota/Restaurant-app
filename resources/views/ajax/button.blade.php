<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
            crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function (){
            $("#btn").click(function (){
                $('#test').load("data.txt");
            });

        });
    </script>
</head>
<body>

<div id="test">
    <p> what's that!!</p>
</div>

<button id="btn">
    click to chnage
</button>

</body>
</html>
