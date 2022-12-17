<!DOCTYPE html>
<html lang="en">
    <body>
        <div>
        <h1>hi {{ $name }},</h1>
        <p>it's almost time, Your table is nearly ready, sho head on down (we'll hold it for 10 mins).</p>
        <a href="{{route('request.confirmView',$request)}}">Confirm you're coming</a>
        </div>
    </body>
</html>
