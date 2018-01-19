<header>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
      <div class="container-fluid">
          <!-- -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanden="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                  
              </button>
              <a class="navbar-brand" href="{{ route('dashboard') }}">Brand</a>              
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="{{ route('account') }}">Account</a></li>
                  <li><a href="{{ route('logout') }}">Logout</a></li>
                   <select name="setlocale" id="setlocale">
                        <option value ="en" data-input="en"><a href="{{route('setlocale', ['locale' => 'en'])}}">ENG</a></option>
                        <option value ="lv" data-input="lv"><a href="{{route('setlocale', ['locale' => 'lv'])}}">LV</a></option>
                   </select>
              </ul>
          </div>
           
      </div>
</header>