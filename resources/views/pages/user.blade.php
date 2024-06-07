@extends('layouts.main')
@section('content')
    <div class="container">
        @session('succes')
            <h3 style="color: greenyellow">{{session('succes')}}</h3>
        @endsession
        <div class="title-table" style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px;">
            <h2 style="color: white;">Kelola user</h2>
            <a href="{{url('/user/create')}}">
                <button class="form-btn primary-default-btn transparent-btn">+ Create User</button>
            </a>
        </div>
        <div class="users-table table-wrapper">
            <table class="posts-table">
                <thead>
                    <tr class="users-table-info">
                        <th style="padding-left: 15px">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td style="display: flex; align-items: center">
                                <a style="width: 70px; margin-right: 5px; height: 100%; display: inline-block" href="{{url('user/edit')}}/{{$user->id}}">
                                    <button class="button-28" role="button">Edit</button>                                  
                                </a>
                                <form action="{{url('user')}}/{{$user->id}}" method="POST" style="display: inline">
                                    @method('delete')
                                    @csrf
                                    <button class="button-28-del" style="border-color: red" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection