<!-- Card -->
<div class="card promoting-card w-auto">

  <!-- Card content -->
  <div class="card-body pb-3">

    <!-- Title -->
      <h4 class="h6 card-title font-weight-bold mb-2">{{ $article->title }}</h4>

    <!-- Content -->
    <div class="d-flex">
      <!-- Avatar -->
    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle d-inline-block mr-3" height="30px" width="30px" alt="avatar">

      <!-- Subtitle & username -->
      <div>
        <p class="small text-black-50 m-0"><i class="far fa-clock pr-2"></i>{{ $article->created_at->format('Y/m/d') }}</p>
        <p class="small text-black-50 m-0">{{ $article->user->name }}</p>
      </div>

    </div>

  </div>

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top rounded-0" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/full page/2.jpg" alt="Card image cap">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body p-1">
    <span class="p-1 mt-1 ml-2 badge badge-secondary">{{ $article->category->name }}</span>

    <i class="fas fa-share-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
    <i class="fas fa-heart text-muted float-right p-1 my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i>

  </div>

</div>
<!-- Card -->
