      <link rel="stylesheet" href="<?=BASEURL;?>/css/slide.css" >
  </head>
  <body>
    <div class="main">
      <input type="checkbox" id="chk" aria-hidden="true" >
      <div class="signup">
      </div>
      <div class="login">
        <form action="<?=BASEURL;?>/login/auth" method="post">
          <label for="chk" aria-hidden="true">Login</label>
          <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" />
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password"
            required
            autocomplete="off"
          />
          <button type="submit" name="submit">Login</button>
        </form>
        </>
      </div>
    </div>