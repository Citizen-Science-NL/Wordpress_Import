<?php
$data = wpgetapi_endpoint( 'eu_citizen_science', 'organisations', array('debug' => false) );

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
  <br>
  <table >
    <tr>
      <td style="min-width:250px;">
         <a href="https://eu-citizen.science/organisation/<?php esc_html_e(  $item['id']); ?>">
         <img src="<?php esc_html_e(  $item['logo']); ?>"
          alt="Organisation logo" object-fit="contain" width="200px">
         </a>
      </td>
      <td>
          
        <p>
        <?php esc_html_e(  strip_tags ($item['description'])); ?>
        </p>
  
      </td>
    </tr>
  </table>

      
        <?php endforeach;

        } else { ?>

            <tr>
                <td colspan="4">No quotes were found.</td>
            </tr>

        <?php } ?>

    </tbody>
</table>