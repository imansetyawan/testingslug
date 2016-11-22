@include('css')
@include('navbar')
@include('sitebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Message</h3>
              <!-- <div class="box-tools">
        	
   	         </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>

                </tr>
                @foreach($messages as $message)
                <tr>
                  <td>{{$message->id}}</td>
                  <td>{{$message->name}}</td>
                  <td>{{$message->email}}</td>
                  <td>{{$message->subject}}</td>
                  <td>{{$message->message}}</td>
                  
                  <td><a href="{{ route('get_update_message', ['id' => $message->id]) }}"><button style="margin-right: 9px; padding-bottom: 0px; padding-top: 0px;" type="submit" class="btn btn-primary">Edit</button></a>
                  	  
                      <form id="myform" style="margin-left: 53px; margin-top: -23px;" class="" action="{{ route('get_delete_message', ['id' => $message->id]) }}" method="post">
                      <input type ="hidden" name="_method" value="delete">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <button style="padding-top: 0px; padding-bottom: 0px;" type="submit" value="delete" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                  
                </tr>
                @endforeach
              </table>

              <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li>{!! $messages->links() !!}</a></li>
              </ul>
            </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>

    
    </div>
  </aside>
  
  @include('js')
  @include('footer')
