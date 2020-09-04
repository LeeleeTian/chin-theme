<form method="post" class="resources__searcher">
    <div class="form-group resources__searcher__search">
        <div class="input-group">
            <input type="text" class="form-control" name="resources_search" placeholder="Search" <?= $search !== null ? 'value="'.htmlspecialchars($search).'"' : '' ?>>
            <div class="input-group-addon">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    <p class="pc__sidebar__header"><?= Lingo::get('label.filter_by') ?></p>
    <div class="form-group">
        <select name="resources_filter">
            <option value="1" <?= $filter == 1 ? 'selected="selected"' : '' ?>><?= Lingo::get('label.categories') ?></option>
            <option value="2" <?= $filter == 2 ? 'selected="selected"' : '' ?>><?= Lingo::get('label.title') ?></option>
        </select>
    </div>
</form>