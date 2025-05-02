@extends('layouts.admin')
@section('content')
<h2 class="mb-4">Statistiques générales</h2>
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card texte-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Albums disponibles</h5>
                <p class="card-text fs-2">{{$totalAlbums}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card texte-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Commades passées</h5>
                <p class="card-text fs-2">{{$totalOrders}}</p>
            </div>
        </div>
    </div>
</div>

<h4 class="mt-4">dernières commades</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Client</th>
            <th>Album</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($latestOrders as $order)
            <tr>
                <td>{{$order->user->name ?? 'Client inconnu'}}</td>
                <td>{{$order->album->title ?? 'Inconnu'}}</td>
                <td>{{$order->created_at->format('d/m/y H:i')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection