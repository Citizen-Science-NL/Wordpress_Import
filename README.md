# Wordpress_Import
The code written for the Wordpress page that imports Dutch projects from the EU site. 
These scripts make simple API calls and render a HTML Template. 

Due to time constraints we opted to make the import of the API data as simple as possible. Considering moving away from Wordpress altogether. This is why we make use of 2 plugins: 
- XYZ PHP Code: So we can write simple parsing logic
- WPFetAPI: A plugin for calling external API's. 
# How it works: 
- The GET request fetches data from the extneral API 
- The PHP parsing code processes the data we received and removes unwanted characters
- The PHP parsing also creates a 'card row' in the HTML for every received item. 
- The is embedded into wordpress using shortcodes. Basically there where you paste the shortcode, Wordpress will put the fetched data. 

# Installation: 
### Prerequesits:
1. From the Wordpress plugin store, download and activat the 2 plugins mentioned above. 

### Setting up the GET requests
2. In WPGetAPI create a new API with the name: eu-citizen.science
3. uniqueID: eu_citizen_science
4. base URL: https://eu-citizen.science/api 
5. Save and move to the tab for that you just created
6. Create a new endpoint called projects
7. method: GET
8 Results format PHP Array Data
9. query string: name: "country", value: NL  (This ensures we just get dutch projects)
10. no encoding
11. Make another endpoint with the same settings only change unique ID and endpoint to 'organisations'. 
12. Save everything

### Setting up the PHP parsing of the fetched data
13. Move to the XYZ PHP Code plugin
14. Create a new PHP Code Snippet called organisations
15. In that snippet paste the PHP code of organisations.php and save
16 do the same for "projects" and copy from the projects.php file. 
17. in the plugin you should now find 2 Wordpress shortcodes. Save these. 


### How to use within Wordpress
18. On the page where you want to display the fetched data  you paste that wordpress shordcode. 

# Known limitations
- We can just render what is in the API (we did some scrubbing to remove HTML tags from the text) -> But the processing is fairly simple. What we get from the API is rendered
- Due to variations in fetched data (Long vs short text or pictures in landscapve vs portrait) it's fairly complex to make a uniform look and feel. The imaged fetched are not always of the highest resolution and some have borders. This again is caused by the simplistic approach of just fetching whatever the API stores for us. 


# How to modify 
### Add new API endpoint: 
- In the case other information is to be fetched it is smart to add another API endpoint like instructed above. 
- All steps will be the same except for the parsing. Depending on the data that your new endpoint stores, you might want to update the HTML to show different elements. 

### Changing styling: 
- Both PHP snippets have a styling section. in plain CSS. 
- This CSS overwrites the wordpress theme. (so if you want to make the information more in line with wordpress remove CSS, or if you want to deviate from the theme then add CSS)
- Where no CSS is specified the items will be rendered as per Wordpress theme. 

### Changing the information shown: 
- The information comes straight from the API endpoint. 
- Check for instance: https://eu-citizen.science/api/organisations/?country=NL 
- You'll find that each piece of information has a label. You can call those labels from the PHP code in simple HTML
- See the snipet below there you see in the 1st line that we create a link to the organisation page. 
- We pick $item['id'] which is the ID of the project on eu-citizen.science --> This allows us to construct the url we want to go to
- A simpler example is showing the 'name' of the project by picking the  `<?php esc_html_e(  $item['name']); ?>` 
- Basically: if you want to add or change datafields then you use the snippit above, and change the part between brackets for the name of the field known in the API. 
- As an example, if you want the 'country' then you would add: `<?php esc_html_e(  $item['country']); ?>` to your HTML


This is the snippit of HTML that we render for each item: 
```
<a href="https://eu-citizen.science/organisation/<?php esc_html_e(  $item['id']); ?>">
<div class="card-container">
  <div class="float-layout">
    <div class="card-image">

       <img src="<?php esc_html_e(  $item['logo']); ?>" alt="Organisation logo">

      <div class="card">
        
        <h1><?php esc_html_e(  $item['name']); ?> </h1>
        <p><?php esc_html_e(  strip_tags ($item['description'])); ?></p>

      </div>
    </div>
  </div>
</div>
</a>
```

### Accompanying pictures from the Wordpress interface: 
 
