      <div class="card" style="width: 18rem;margin : 15% auto">
        <div class="card-body">
            <form action="<?=BASEURL;?>/login/auth" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name= "submit">Submit</button>
                
              </form>
            </div>
      </div>