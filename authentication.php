<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="typingdna.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                    var tdna  = new TypingDNA();
                    try
                    {
                        document.getElementById("tpSubmit").addEventListener("click", myFunction);
                        function myFunction() {
                            var dna_post = document.getElementById("textArea").value;
                            var typingPattern = tdna.getTypingPattern({type:1, text:dna_post});
                            document.getElementById("tp").value = typingPattern;
                        }
                    }
                    catch(err) {
                    }
                });
        </script>
    </head>
    <body>

        <h1>TypingDNA Authentication</h1>

        <p>Please type this text</p>

        <p>The white fox jumps over the fence</p>

        <form action="action.php" method="POST">
            <input type="text" id="textArea" name="textArea"><br><br>
            <input type="hidden" id="action" name="action" value="authenticate">
            <input type="hidden" id="number" name="number" value="<?php echo $_GET["no"];?>">
            <input type="hidden" id="tp" name="tp" value="">
            <input type="hidden" id="userid" name="userid" value="<?php echo $_GET["userid"];?>">
            <button id="tpSubmit">Authenticate</button>
        </form>

    </body>
</html>
