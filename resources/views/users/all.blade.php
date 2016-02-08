 @extends('layouts.master')
    @section('content')
        <div class="page-content">

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_content">
                            <table id="clientall" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" class="tableflat">
                                    </th>
                                    <th>User ID </th>
                                    <th>Name </th>
                                    <th>Username </th>
                                    <th>Email </th>
                                    {{-- <th>Amount </th> --}}
                                    <th class=" no-link last"><span class="nobr">Action</span>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    @if ($user->id % 2 == 0)
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="tableflat">
                                            </td>
                                            <td class=" ">{{sprintf("%'.05d\n", $user->id)}}</td>
                                            <td class=" ">{{$user->name}} </td>
                                            <td class=" ">{{$user->username}}</td>
                                            <td class=" ">{{$user->email}}</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) !!}
                                                    <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete the user?')" class="btn btn-danger btn-sm">Delete</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="tableflat">
                                            </td>
                                            <td class=" ">{{sprintf("%'.05d\n", $user->id)}}</td>
                                            <td class=" ">{{$user->name}} </td>
                                            <td class=" ">{{$user->username}}</td>
                                            <td class=" ">{{$user->email}}</td>
                                            <td class=" last">
                                                {!! Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) !!}
                                                    <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-success">Edit</a>
                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete the user?')" class="btn btn-danger btn-sm">Delete</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {!! $users->render() !!}
                        </div>
                    </div>
                </div>

                <br />
                <br />
                <br />

            </div>
            <script type="text/javascript" charset="utf-8" async defer>
                jQuery(document).ready(function($) {
                    var oTable = $('#clientall').dataTable({
                        "oLanguage": {
                            "sSearch": "Search all columns:"
                        },
                        "aoColumnDefs": [
                            {
                                'bSortable': false,
                                'aTargets': [0]
                            }, //disables sorting for column one
                            {
                                'sWidth': '20%',
                                'aTargets': [5]
                            }
                        ],
                        "bPaginate": false,
                        // 'iDisplayLength': 12,
                        // "sPaginationType": "full_numbers"
                    });
                });
            </script>
        </div>
    @endsection