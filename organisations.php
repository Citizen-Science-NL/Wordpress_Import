<?php
$data = wpgetapi_endpoint( 'eu_citizen_science', 'organisations', array('debug' => false) );

// prints out our raw data
// delete or comment this out when not required
//wpgetapi_pp($data); ?>

<style>
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(275px, 1fr));
  grid-gap: 20px;
  align-items: center;
  flex-grow: 1;
  flex-flow: row wrap;
  }
.card {
  flex-flow: row wrap;
}
.grid > article {
  border: 1px solid #ccc;
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.3);
  flex-grow: 1;
  flex-flow: row wrap;
  height: 500px;
  overflow: hidden;
}
.grid > article img {
  max-width: 100%;
}
.text {
  padding: 0 20px 20px;
  flex-grow: 1;
}
.text > button {
  background: gray;
  border: 0;
  color: white;
  padding: 10px;
  width: 100%;
  }
</style>

<main class="grid">
    <?php 
    // ensure we have the correct data
    if( isset( $data ) && is_array( $data) ) {

        // loop through each item in the results array
        foreach ( $data as $i => $item ) : ?>

<article >
<a href="https://eu-citizen.science/organisation/<?php esc_html_e(  $item['id']); ?>">
<img src="<?php esc_html_e(  $item['logo']); ?>" alt="Organisation logo ">
</a>
    <div class="text">
      <h3><?php esc_html_e(  $item['name']); ?></h3>
      <p><?php esc_html_e(  substr(strip_tags ($item['description']), 0, 200)); ?></p>
      
    </div>
  </article>


      
        <?php endforeach;

        } else { ?>

            <tr>
                <td colspan="4">No organisations were found.</td>
            </tr>

        <?php } ?>

</main>