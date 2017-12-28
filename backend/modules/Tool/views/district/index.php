<?php
$this->title = '地址管理';
$this->params['breadcrumbs'][] = ['label'=>'地址管理'];
?>
<div class="district-content">
    <div class="do-action">
        <ul class="do-navigation">
            <li><a href="#">添加信息地址</a></li>
            <li><a href="#">添加信息地址</a></li>
        </ul>
        <ul class="do-search">
            <li>
                <label>搜索：<input type="text" class="input-text" placeholder="请输入需要搜索的关键字..."></label>
                <span class="search-button">搜索</span>
                <a href="javascript:location.reload();" class="reload">重置</a>
            </li>
        </ul>
    </div>
    <div class="category">
        <ul class="item-block">
            <li>亚洲</li>
            <li>欧洲</li>
            <li>北美洲</li>
        </ul>
        <ul class="item-block">
            <li>亚洲</li>
            <li>欧洲</li>
            <li>北美洲</li>
        </ul>
    </div>
    <table class="table table-striped table-bordered table-hover dataTables-example dataTable">
        <thead>
            <tr role="row">
                <th class="sorting" style="width: 262px;">渲染引擎</th>
                <th class="sorting" style="width: 461px;">浏览器</th>
                <th class="sorting" style="width: 424px;">平台</th>
                <th class="sorting" style="width: 186px;">引擎版本</th>
                <th class="sorting" style="width: 190px;">CSS等级</th>
            </tr>
        </thead>
        <tbody>
            <tr class="gradeA odd">
                <td class="">Presto</td>
                <td class="">Opera 9.0</td>
                <td class="">Win 95+ / OSX.3+</td>
                <td class="center">-</td>
                <td class="center  sorting_1">A</td>
            </tr>
            <tr class="gradeA even">
                <td class="">Presto</td>
                <td class="">Opera 8.5</td>
                <td class="">Win 95+ / OSX.2+</td>
                <td class="center">-</td>
                <td class="center  sorting_1">A</td>
            </tr>
        </tbody>
    </table>
    <ul class="pagination clear">
        <li class="paginate_button"><span>共40条数据,每页20条,总共2页,当前第2页</span></li>
        <li class="paginate_button previous"><a href="#">上一页</a></li>
        <li class="paginate_button active"><a href="#">1</a></li>
        <li class="paginate_button"><a href="#">2</a></li>
        <li class="paginate_button"><a href="#">3</a></li>
        <li class="paginate_button next"><a href="#">下一页</a></li>
    </ul>
</div>