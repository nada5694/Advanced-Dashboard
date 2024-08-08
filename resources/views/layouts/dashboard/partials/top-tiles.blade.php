<div class="row" style="display: inline-block;" >
    <div class="tile_count">
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
          <div class="count">{{ \App\Models\User::count() }}</div>
          <span class="count_bottom" style="color: #F7F7F7;"><i class="green" style="color: #F7F7F7;">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-clock-o"></i> Total Products</span>
          <div class="count green">{{ \App\Models\Product::count() }}</div>
          <span class="count_bottom" style="color: #F7F7F7;"><i class="green" style="color: #F7F7F7;"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Categories</span>
          <div class="count">{{ \App\Models\Category::count() }}</div>
          <span class="count_bottom" style="color: #F7F7F7;"><i class="green" style="color: #F7F7F7;"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> To Do List Items</span>
          <div class="count">0</div>
          <span class="count_bottom" style="color: #F7F7F7;"><i class="red" style="color: #F7F7F7;"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
          <div class="count">0</div>
          <span class="count_bottom" style="color: #F7F7F7;"><i class="green" style="color: #F7F7F7;"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
          <div class="count">0</div>
          <span class="count_bottom" style="color: #F7F7F7;"><i class="green" style="color: #F7F7F7;"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
      </div>
  </div>
