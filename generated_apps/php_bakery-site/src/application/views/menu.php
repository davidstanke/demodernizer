<h1>Our Menu</h1>

<div>
    <strong>Categories:</strong>
    <button class="filter-btn" data-category="all">All</button>
    <button class="filter-btn" data-category="Pastries">Pastries</button>
    <button class="filter-btn" data-category="Drinks">Drinks</button>
</div>

<div id="menu-items">
    <!-- FIXME: Hardcoded items, need to pull these from the database soon -->
    <div class="menu-item" data-category="Pastries">
        <h3>Butter Croissant</h3>
        <span class="badge-vegan">Vegan</span>
        <button class="add-to-order" data-price="3.50">Add to Order</button>
    </div>
    
    <div class="menu-item" data-category="Pastries">
        <h3>Pain au Chocolat</h3>
        <button class="add-to-order" data-price="4.00">Add to Order</button>
    </div>

    <div class="menu-item" data-category="Pastries">
        <h3>Cinnamon Roll</h3>
        <button class="add-to-order" data-price="4.50">Add to Order</button>
    </div>

    <div class="menu-item" data-category="Drinks">
        <h3>Espresso</h3>
        <button class="add-to-order" data-price="2.50">Add to Order</button>
    </div>

    <div class="menu-item" data-category="Drinks">
        <h3>Latte</h3>
        <button class="add-to-order" data-price="3.50">Add to Order</button>
    </div>
    
    <div class="menu-item" data-category="Drinks">
        <h3>Large Oat Milk Latte</h3>
        <span class="badge-gluten-free">Gluten-Free</span>
        <button class="add-to-order" data-price="4.50">Add to Order</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // copy items into a master list array object thing
        var arrItemsMasterList_DO_NOT_MODIFY = $('.menu-item').clone(); 
        
        $('.filter-btn').live('click', function() {
            var strCat = $(this).attr('data-category');
            var oContainerNode = $('#menu-items');
            
            // clear the container
            oContainerNode.empty();
            
            var strMagicAll = 'all';
            var bIsAllSelected = (strCat === strMagicAll);
            
            if (bIsAllSelected) {
                oContainerNode.append(arrItemsMasterList_DO_NOT_MODIFY);
            } else {
                if (false && strCat === 'none') {
                    // I don't think we have a none category anymore 
                    alert('No items found');
                } else {
                    // filter the master list
                    var objFilteredTemp = arrItemsMasterList_DO_NOT_MODIFY.filter('[data-category="' + strCat + '"]');
                    oContainerNode.append(objFilteredTemp);
                }
            }
        });
    });
</script>