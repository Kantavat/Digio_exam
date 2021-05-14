@extends('layouts.master')

@section('content')


<div class="row text-center">
    <div class="col-sm">
        <div class="mt-3 ml-5">
           
            {{-- <a  href="{{route('create')}}"> --}}
                <img id="main_logo" src="https://www.pngkey.com/png/full/205-2056860_oh-my-god-tic-tac-toe-logo.png" alt="TICTACTOE_logo">
            {{-- </a> --}}

        </div>
    
        <div>
            <p id="showdate">
                <?php
                    echo "Date : " . date("d/m/Y") ."<br>";
                ?>
            </p>
        </div>

        <div id="carouselIndicators" class="carousel slide mb-2 W-100" data-ride="carousel">
            <ol class="carousel-indicators ">
              <li data-target="#carouselIndicators" class="mb-3" data-slide-to="0" class="active"></li>
              <li data-target="#carouselIndicators" data-slide-to="1"></li>
              <li data-target="#carouselIndicators" data-slide-to="2"></li>
              <li data-target="#carouselIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
              <div id="howtoplay1 " class="carousel-item active ">
                <h3>  HOW TO PLAY </h3>
              </div>
              <div id="howtoplay2" class="carousel-item">
                <h3>  "SAVE" button will available after some user win the game.</h3>
              </div>
              <div id="howtoplay3" class="carousel-item">
                <h3> "ViewReplays" button to view saved game replays .</h3>
              </div>
              <div id="howtoplay3" class="carousel-item">
                <h3> "playagain" button for rematch/clear table.</h3>
              </div>
              
            </div>
            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
            {{-- <div class="form-group">
                <label for="exampleInputEmail1">Table Size</label>
                <input id="size_table" type="text" class="form-control"  aria-describedby="sizelHelp" placeholder="Enter Size" value="3">
                <small id="sizeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <input id="sizeSubmit" class="btn btn-warning" value = "submit">
            </div> --}}
    
            <div id="main_table" >
                <input type="hidden" name="table_size" value=3>
                <table class="table text-center">
                    <tr>
                        <td id = "10">  </td>
                        <td id = "11">  </td>
                        <td id = "12">  </td>
                    </tr>
                    <tr>
                        <td id = "20">  </td>
                        <td id = "21">  </td>
                        <td id = "22">  </td>
                    </tr>
                    <tr>
                        <td id = "30">  </td>
                        <td id = "31">  </td>
                        <td id = "32">  </td>
                    </tr>
                </table>
            </div>
            <form method="post" action="add">
                @csrf
                <input type="hidden" name="data" value="NODATA">
    
                <input id="savegame" type="submit" class="btn btn-primary mt-2" value="SAVE" disabled>
                <input id="playAgain" type="button" class="btn btn-success mt-2" value="Play again">
            </form>
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  VIEW REPLAY
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @foreach ($replays as $replay)
                    <a id="{{$replay['data']}}" name="replay_list" class="dropdown-item" 
                        data-toggle="modal" data-target="#replayModal" value="LOAD">{{$replay['created_at']}}
                    </a>
                        {{-- <script>
                            // reclick_td.push($(this).attr("id"));
                            save_date.push();
                        </script> --}}
                  @endforeach
                </div>
              </div>
    </div>
    {{-- <div class="col-sm">
        
    </div> --}}
  
  </div>

  <!-- Modal -->
<div class="modal fade " id="replayModal" tabindex="-1" role="dialog" aria-labelledby="replayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title text-light" id="replayModalLabel">REPLAY</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
            <div id="replayList_table" >
                <input type="hidden" name="table_size" value=3>
                <table class="table text-center">
                    <tr>
                        <td id = "0">  </td>
                        <td id = "1">  </td>
                        <td id = "2">  </td>
                    </tr>
                    <tr>
                        <td id = "3">  </td>
                        <td id = "4">  </td>
                        <td id = "5">  </td>
                    </tr>
                    <tr>
                        <td id = "6">  </td>
                        <td id = "7">  </td>
                        <td id = "8">  </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




    

@endsection