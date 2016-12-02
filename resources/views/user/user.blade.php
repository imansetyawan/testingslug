@include('css')
@include('navbar')
@include('sitebar')

	<div class="content-wrapper">
		<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                @if(Session::has('messageinsert'))
                <div class="callout callout-success">
                {{ Session::get('messageinsert') }}
                </div>
                @endif
                @if(Session::has('messageupdate'))
                <div class="callout callout-info">
                {{ Session::get('messageupdate') }}
                </div>
                @endif
                @if(Session::has('messagedelete'))
                <div class="callout callout-danger">
                {{ Session::get('messagedelete') }}
                </div>
                @endif     
                <div class="box-header">
                  <h3 class="box-title">User</h3>

                  <div class="box-tools">
                    <a href="{{ route('get_insert_user') }}"><button id="add" type="button" class="btn btn btn-success btn-sm">Insert</button></a>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>User</th>
                      <th>Author</th>
                      <th>Admin</th>
                      <th></th>
                      <th>Menu</th>
                    </tr>
                     @foreach($users as $user)
                    <tr>
                      <form action="{{ route('assign_roles') }}" method="post">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                        <td><input type="checkbox" name="role_user" {{ $user->hasRole('user') ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="role_author" {{ $user->hasRole('author') ? 'checked' : '' }}></td>
                        <td><input type="checkbox" name="role_admin" {{ $user->hasRole('admin') ? 'checked' : '' }}></td>
                        {{ csrf_field() }}
                        <td><button type="submit" class="btn btn-primary">Assign Role</button></td>
                      </form>
                      <td><a href="{{ route('get_update_user', ['id' => $user->id]) }}"><button style="margin-right: 9px; padding-bottom: 0px; padding-top: 0px;" type="submit" class="btn btn-primary">Edit</button></a>
                      
                      <form id="myform" style="margin-left: 53px; margin-top: -23px;" class="" action="{{ route('get_delete_user', ['id' => $user->id]) }}" method="post">
                      <input type ="hidden" name="_method" value="delete">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <button style="padding-top: 0px; padding-bottom: 0px;" type="submit" value="delete" class="btn btn-danger">Delete</button>
                      </form>
                      </td>
                    </tr>
                    @endforeach

                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </section>
    
	</div>

  @include('footer')
  @include('js')