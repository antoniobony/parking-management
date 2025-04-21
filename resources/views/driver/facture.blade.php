<div>
    <div style="float:top">
        <h1>REÇU</h1>
    </div>
    <div>
        <p>Nom du client: {{$username}}</p>
        <p>Adresse du parking: {{$location}}</p>
        <p>Date: {{$date}}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Règlement</th>
                <th>Durré du parking</th>
                <th>Prix du parking</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{$image}}</th>
                <th>{{$rule}}</th>
                <th>{{$duration->h}}:{{$duration->i}}:{{$duration->s}}</th>
                <th>{{$price}}</th>
            </tr>
        </tbody>
    </table>
</div>