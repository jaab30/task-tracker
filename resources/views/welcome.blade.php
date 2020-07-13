@extends("layouts.app")

@section("content")
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Task Manager</h1>
    <p class="lead">The only Task Manager App that keep track of your tasks..!</p>
    <a class="btn btn-dark btn-lg" href="{{ route('tasks.index') }}" role="button">Start tracking your Tasks</a>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img style="height:200px" src="https://cdn.lynda.com/course/169055/169055-637286160171938323-16x9.jpg" class="card-img-top" alt="Manage Tasks image">
                <div class="card-body">
                    <h5 class="card-title text-center">Task Reports</h5>
                    <p class="card-text text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae nemo commodi debitis veniam eligendi fugit cumque dolorum, praesentium quos harum consequatur autem, soluta ullam non?</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img style="height:200px" src="https://www.cambridgemaths.org/Images/The-trouble-with-graphs.jpg" class="card-img-top" alt="results graph">
                <div class="card-body">
                    <h5 class="card-title text-center">Measure your Tasks</h5>
                    <p class="card-text text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum, eius vel quisquam aliquid nulla recusandae saepe neque labore. Enim consectetur inventore sequi voluptas, natus maxime!</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img style="height:200px" src="https://kinsta.com/wp-content/uploads/2017/10/wordpress-charts-2.png" class="card-img-top" alt="Share tasks image">
                <div class="card-body">
                    <h5 class="card-title text-center">Share Tasks</h5>
                    <p class="card-text text-justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur eum unde recusandae, provident cupiditate velit obcaecati pariatur eaque delectus sint suscipit fugiat voluptatum dolores nostrum!</p>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection
