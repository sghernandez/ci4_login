<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">            
            <?= form_open(site_url('login')).
                form_hidden('send', TRUE) ?>
                <h1 class="text-center">Iniciar Sesión</h1>	
                <?php if(session()->getFlashdata('error')): ?>	 
                  <div class="alert alert-danger" role="alert">
                  <?= session()->getFlashdata('error') ?>
                  </div>                                   
                <?php endif ?>
              <div>
				      <span><strong>Email</strong></span>
                <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="Email" required />
              </div><br>
              <div>
				<span><strong>Contraseña</strong></span>
                <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>" placeholder="Password" required />
              </div><br>
              <div>
                <button type="submit" class="btn btn-block btn-warning submit">Abrir Sesión</button>                
              </div>
           <?= form_close() ?>
          </section>
        </div>
      </div> 

<?= $this->endSection() ?>