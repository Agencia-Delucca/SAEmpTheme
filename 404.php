<?php get_header(); ?>
<div id="page404">
  <h1>
    404
  </h1>
  <h2>Ops! Esta página ainda está em construção.</h2>
  <p>
    Volte para conhecer empreendimentos à altura dos seus desejos.
  </p>
  <a href="<?php echo home_url(); ?>" class="btn">Página Inicial</a>
</div>

<style>
  #page404 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 750px;
    text-align: center;
    color: #fff;
    background: center / cover no-repeat url(<?php echo get_template_directory_uri(); ?>/assets/imgs/404_bg.jpg);
  }
  #page404 h1 {
    font-size: 250px;
    line-height: 1;
  }
  #page404 p {
    margin-top: 8px;
    margin-bottom: 32px;
  }
  #page404 .btn {
    padding: 16px 48px;
    text-decoration: none;
    border-radius: 40px;
    background: #fff;
    color: var(--clr-primary);
  }
</style>
<?php get_footer(); ?>