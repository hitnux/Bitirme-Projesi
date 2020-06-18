@extends('layouts.admin')

@section('content')
<b-tabs type="is-boxed">
    <b-tab-item label="Ürünler">
        <List></List>
    </b-tab-item>
    <b-tab-item label="Siparişler">
        <List></List>
    </b-tab-item>
    <b-tab-item label="Kullanıcılar">
        <List></List>
    </b-tab-item>
</b-tabs>
@endsection