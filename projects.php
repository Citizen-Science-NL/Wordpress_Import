<?php
$data = wpgetapi_endpoint( 'eu_citizen_science', 'projects', array('debug' => false) );

// prints out our raw data
// delete or comment this out when not required
//wpgetapi_pp($data); ?>
<style>
.float-layout {
  padding: 5px 5px;
  float: left;
  width: 100%;
  height: auto;
  box-sizing: border-box;
  margin: 0;
}

.card-container {
  overflow: hidden;
}

.card {
  background-color: white;
  color: black;
  min-height: 100%; /*replace this it in width: 100%*/
  width: 50%;
  float: right;
}

.card-title {
  font-size: 30px;
  text-align: center;
  font-weight: bold;
  padding-top: 20px;
}

.card-desc {
  padding: 10px;
  text-align: left;
  font-size: 18px;
}

/*add this it*/
.card-image {
  display: flex;
}
/*-------------*/

div.card-image img {
  width: 25%;
  height: auto;
  object-fit: contain;
}
.pill-btn{
  height: 35px;
  line-height: 64px;
  background: #6188FF;
  padding: 0px 30px;
  border-radius: 999em;
  text-decoration: none;
  color: #fff;
  font-size: 16px;
      vertical-align: bottom;
    white-space: nowrap;
  border: 3px solid #5C81F2;
}

/* Phone Devices Query */
@media only screen and (max-width: 37.5em) {
  div.card-image img {
    width: 100%;
    height: auto;
  }
  
  /*add this it*/
  .card-image {
     flex-direction: column;
  }
  /*----------------------*/

  .card {
    width: 100%;
    margin-top: -4px;
  }
}
</style>




    <?php 
    // ensure we have the correct data
    if( isset( $data ) && is_array( $data) ) {

        // loop through each item in the results array
        foreach ( $data as $i => $item ) : ?>

<a href="https://eu-citizen.science/project/<?php esc_html_e(  $item['id']); ?>">
<div class="card-container">
  <div class="float-layout">
    <div class="card-image">
       <img src="<?php esc_html_e(  $item['image1']); ?>" alt="Organisation logo">

      <div class="card">
        
        <div class="card-title"><h1><?php esc_html_e(  $item['name']); ?></h1></div>
        <div class="card-desc">
          <h2>Description </h2>
          <p><?php esc_html_e(  strip_tags ($item['description'])); ?></p>
           <h2>Aim </h2>
          <p><?php esc_html_e(  strip_tags ($item['aim'])); ?></p>

          <h2>Contact </h2>
          <p><?php esc_html_e(  $item['url']); ?></p>
          <p><?php esc_html_e(  $item['author_email']); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</a>
      
        <?php endforeach;

        } else { ?>

            <tr>
                <td colspan="4">No Organisations were found.</td>
            </tr>

        <?php } ?>

    </tbody>
</table>