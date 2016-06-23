<?php
	require_once 'header.php';
?>
	<div id="content" class="xfluid">
		<a name="line"></a>
		<div class="portlet x6">
			<div class="portlet-header">
				<h4>
					Line Chart
				</h4>
			</div>
			<div class="portlet-content">
				<table style="display: none;" class="stats" title="line" cellpadding="0" cellspacing="0" width="100%">
					<caption>
						2010 Sales by industry (Million)
					</caption>
					<thead>
						<tr>
							<td>
								&nbsp;
							</td>
							<th>
								Banking
							</th>
							<th>
								Beauty
							</th>
							<th>
								Insurance
							</th>
							<th>
								Internet
							</th>
							<th>
								Media
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>
								2010
							</th>
							<td>
								12
							</td>
							<td>
								15
							</td>
							<td>
								11
							</td>
							<td>
								14
							</td>
							<td>
								13
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<a name="bar"></a>
		<div class="portlet x6">
			<div class="portlet-header">
				<h4>
					Bar Chart
				</h4>
			</div>
			<div class="portlet-content">
				<table style="display: none;" class="stats" title="bar" cellpadding="0" cellspacing="0" width="100%">
					<caption>
						2010 Sales by industry (Million)
					</caption>
					<thead>
						<tr>
							<td>
								&nbsp;
							</td>
							<th>
								Banking
							</th>
							<th>
								Beauty
							</th>
							<th>
								Insurance
							</th>
							<th>
								Internet
							</th>
							<th>
								Media
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>
								2010
							</th>
							<td>
								12
							</td>
							<td>
								15
							</td>
							<td>
								13
							</td>
							<td>
								5
							</td>
							<td>
								10
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
	require_once 'footer.php';
?>
<script>$(document).ready(function() { $('#dashboardtab').addClass(' mega-current');});	</script>