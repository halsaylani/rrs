<!DOCTYPE html>
<html lang="en">
    <body>
        <div>
        <h1>hi {{ $name }},</h1>
        <p>you are in line for a to get live updates on your wait time or message us click here</p>
        <a href="{{route('request.live',$request)}}">live Update</a>
        </div>
    </body>
</html>
