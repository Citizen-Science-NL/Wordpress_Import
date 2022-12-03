<?php
$data = wpgetapi_endpoint( 'eu_citizen_science', 'projects', array('debug' => false) );

// prints out our raw data
// delete or comment this out when not required
//wpgetapi_pp($data); ?>
    <?php 
    // ensure we have the correct data
    if( isset( $data ) && is_array( $data) ) {

        // loop through each item in the results array
        foreach ( $data as $i => $item ) : ?>

<h1 style="text-align: left;">
    <?php esc_html_e(  $item['name']); ?>
  </h1>
  <h5 style="text-align: left;">
    <?php esc_html_e(  strip_tags ($item['aim'])); ?>
  </h5>
  <br>
  <table >
    <tr>
      <td style="min-width:250px;">
         <a href="https://eu-citizen.science/project/<?php esc_html_e(  $item['id']); ?>">
         <img src="<?php esc_html_e(  $item['image1']); ?>"
          alt="Organisation logo" object-fit="contain" width="100%">
         </a>
      </td>
      <td>
          
        <p>
          <?php esc_html_e(  strip_tags ($item['description'])); ?>
        </p>
  
      </td>
    </tr>
  </table>
</body>
      
        <?php endforeach;

        } else { ?>

            <tr>
                <td colspan="4">No Organisations were found.</td>
            </tr>

        <?php } ?>

    </tbody>
</table>