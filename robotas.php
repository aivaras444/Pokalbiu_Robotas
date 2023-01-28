<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Robotas</title>
    <link rel="stylesheet" href="stilius.css">
    <script src="https://kit.fontawesome.com/437befde71.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">Pokalbiu Robotas</div>
        <div class="conversation">
            <div class="bot-caption caption">
                <span>Robotas</span>
            </div>
            <div class="bot-inbox inbox">
                <div class="msg-header">
                    <p>Sveiki, ar galeciau jums kuo nors padeti?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Siusti zinute..." required>
                <button id="send-btn">
                <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-caption caption"><span>Jus</span></div><div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".conversation").append($msg);
                $("#data").val('');

                //pradeti ajax koda
                $.ajax({
                    url: 'zinutes.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-caption caption"><span>Robotas</span></div><div class="bot-inbox inbox"><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".conversation").append($replay);
                        $(".conversation").scrollTop($(".conversation")[0].scrollHeight);
                    }
                })
            });
        });
    </script>
    
</body>
</html>