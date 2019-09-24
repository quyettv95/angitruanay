<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trưa nay ăn gì</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h1>Hello, buddy!</h1>
            <p>Hôm nay ngày {{ date('d/m/Y') }}</p>
            <p>Bạn đang phân vân hôm nay ăn gì ư? Đừng lo hay để tôi giúp bạn điều đó!</p>
            <p>
                <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tìm hiểu thêm</a>
                <div class="modal fade" id="modal-id">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Ăn gì trưa nay</h4>
                            </div>
                            <div class="modal-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus placeat ipsam molestiae aperiam. Est temporibus distinctio, odio ipsa officiis voluptate ipsam omnis numquam! Vero architecto voluptatibus totam deleniti voluptate cupiditate tempore quas, impedit soluta error minima aliquid qui mollitia odit commodi illum accusamus reiciendis quibusdam id saepe magnam enim maiores! Minima rerum ut nostrum veritatis! Assumenda rerum laborum omnis modi sit est architecto repudiandae corrupti, tenetur aliquam provident numquam similique natus neque quibusdam quidem facilis voluptatum earum, ad, odio cumque dolores et aliquid quisquam illum! A culpa consectetur unde corporis quod quam, soluta maxime, odit nisi impedit sint vero sit cum nam accusantium, quos quas voluptas inventore illo. Iste unde quibusdam vitae consequatur harum odit officia, rem corrupti labore id, vel ullam cumque repellat dolore alias vero commodi voluptates, atque voluptatem! Esse numquam, harum optio sed ratione mollitia alias dicta quisquam eveniet ipsum quia recusandae nihil impedit voluptate consequatur maiores, consectetur accusamus ipsam aliquid illum. Similique eligendi labore praesentium unde officia veritatis delectus sit culpa ab consequuntur laudantium magni atque, quia veniam ad, sapiente rem nisi debitis odio fuga perferendis. Odio laborum libero quod vero quae animi labore consequatur nobis sed delectus repellendus, eum non, cupiditate voluptas dolore natus officiis?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
        </div>
    </div>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Và món ăn của chúng ta hôm nay sẽ là: </h4>
                    <h2>{{ $todayMeal['name'] }}</h2>
                    <img src="{{ $todayMeal['image_url'] }}" width="200px;" class="img-responsive" alt="Image">
                    <br>
                    <p><strong>Description: </strong>{{ $todayMeal['description'] }}</p>
                    <p><strong>Budget:</strong> {{ $todayMeal['budget'] }}</p>
                </div>
            </div>
        </div>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
      var OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "8a8283f1-7562-4a3f-b4a3-de824b2a2c61",
        });
      });
    </script>
</body>
</html>
