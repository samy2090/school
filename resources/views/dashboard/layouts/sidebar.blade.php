		<!-- Main sidebar -->
		<div class="sidebar sidebar-main sidebar-expand-lg align-self-start">

			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Sidebar header -->
				<div class="sidebar-section">
					<div class="sidebar-section-body d-flex justify-content-center">
						<h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

						<div>
							<button type="button" class="btn btn-light btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
								<i class="ph-arrows-left-right"></i>
							</button>

							<button type="button" class="btn btn-light btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
								<i class="ph-x"></i>
							</button>
						</div>
					</div>
				</div>
				<!-- /sidebar header -->


				<!-- Main navigation -->
				<div class="sidebar-section">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header pt-0">
							<div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">{{ trans('sidebar.main') }}</div>
							<i class="ph-dots-three sidebar-resize-show"></i>
						</li>
						<li class="nav-item">
							<a href="index.html" class="nav-link">
								<i class="ph-house"></i>
								<span>
									{{ trans('sidebar.dashboard') }}
									<span class="d-block fw-normal text-body opacity-50">No pending orders</span>
								</span>
							</a>
						</li>
						{{-- <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-layout"></i>
								<span>Layouts</span>
							</a>
							<ul class="nav-group-sub collapse" data-submenu-title="Layouts">
								<li class="nav-item"><a href="../../layout_1/full/index.html" class="nav-link">Default layout</a></li>
								<li class="nav-item"><a href="../../layout_2/full/index.html" class="nav-link">Layout 2</a></li>
								<li class="nav-item"><a href="index.html" class="nav-link active">Layout 3</a></li>
								<li class="nav-item"><a href="../../layout_4/full/index.html" class="nav-link">Layout 4</a></li>
								<li class="nav-item"><a href="../../layout_5/full/index.html" class="nav-link">Layout 5</a></li>
								<li class="nav-item"><a href="../../layout_6/full/index.html" class="nav-link">Layout 6</a></li>
								<li class="nav-item"><a href="../../layout_7/full/index.html" class="nav-link disabled">Layout 7 <span class="opacity-75 fs-sm ms-auto">Coming soon</span></a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-swatches"></i>
								<span>Themes</span>
							</a>
							<ul class="nav-group-sub collapse" data-submenu-title="Themes">
								<li class="nav-item"><a href="index.html" class="nav-link active">Default</a></li>
								<li class="nav-item"><a href="../../../LTR/material/full/index.html" class="nav-link disabled">Material <span class="opacity-75 fs-sm ms-auto">Coming soon</span></a></li>
								<li class="nav-item"><a href="../../../LTR/clean/full/index.html" class="nav-link disabled">Clean <span class="opacity-75 fs-sm ms-auto">Coming soon</span></a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-note-blank"></i>
								<span>Starter kit</span>
							</a>
							<ul class="nav-group-sub collapse" data-submenu-title="Starter kit">
								<li class="nav-item"><a href="../seed/layout_navbar_fixed.html" class="nav-link">Fixed navbar</a></li>
								<li class="nav-item"><a href="../seed/layout_navbar_hideable.html" class="nav-link">Hideable navbar</a></li>
								<li class="nav-item-divider"></li>
								<li class="nav-item"><a href="../seed/layout_no_header.html" class="nav-link">No header</a></li>
								<li class="nav-item"><a href="../seed/layout_no_footer.html" class="nav-link">No footer</a></li>
								<li class="nav-item"><a href="../seed/layout_fixed_footer.html" class="nav-link">Fixed footer</a></li>
								<li class="nav-item-divider"></li>
								<li class="nav-item"><a href="../seed/layout_2_sidebars_1_side.html" class="nav-link">2 sidebars on 1 side</a></li>
								<li class="nav-item"><a href="../seed/layout_2_sidebars_2_sides.html" class="nav-link">2 sidebars on 2 sides</a></li>
								<li class="nav-item"><a href="../seed/layout_3_sidebars.html" class="nav-link">3 sidebars</a></li>
								<li class="nav-item-divider"></li>
								<li class="nav-item"><a href="../seed/layout_boxed_page.html" class="nav-link">Boxed page</a></li>
								<li class="nav-item"><a href="../seed/layout_boxed_content.html" class="nav-link">Boxed content</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="../../../../docs/other_changelog.html" class="nav-link">
								<i class="ph-list-numbers"></i>
								<span>Changelog</span>
								<span class="badge bg-primary align-self-center rounded-pill ms-auto">4.0</span>
							</a>
						</li> --}}

						<!-- Layout -->
						<li class="nav-item-header">
							<div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">{{ trans('sidebar.learning') }}</div>
							<i class="ph-dots-three sidebar-resize-show"></i>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-layout"></i>
								<span>{{ trans('sidebar.grades') }}</span>
							</a>

							<ul class="nav-group-sub collapse " data-submenu-title="grades">
								<li class="nav-item"><a href="{{route('grades.index')}}" class="nav-link">{{ trans('sidebar.grades_list') }}</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-layout"></i>
								<span>{{ trans('sidebar.classrooms') }}</span>
							</a>

							<ul class="nav-group-sub collapse " data-submenu-title="classrooms">
								<li class="nav-item"><a href="{{route('classrooms.index')}}" class="nav-link">{{ trans('sidebar.classrooms_list') }}</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu ">
							<a href="#" class="nav-link">
								<i class="ph-columns"></i>
								<span>{{ trans('sidebar.sections') }}</span>
							</a>

							<ul class="nav-group-sub collapse" data-submenu-title="{{ trans('sidebar.sections') }}">
								<li class="nav-item"><a href="{{route('sections.index')}}" class="nav-link">{{ trans('sidebar.sections_list') }}</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-columns"></i>
								<span>{{ trans('sidebar.stdDetails') }}</span>
							</a>
							<ul class="nav-group-sub collapse" data-submenu-title="{{ trans('sidebar.add_stdParents') }}">
										<li class="nav-item"><a href="{{route('addParents')}}" class="nav-link">{{ trans('sidebar.stdParents_dts') }}</a></li>
										{{-- <li class="nav-item-divider"></li> --}}

							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-arrow-fat-lines-down"></i>
								<span>{{ trans('sidebar.teachersInfo') }}</span>
							</a>
							<ul class="nav-group-sub collapse" data-submenu-title="Vertical navigation">
								<li class="nav-item"><a href="navigation_vertical_styles.html" class="nav-link">{{ trans('sidebar.teachersList') }}</a></li>

							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link">
								<i class="ph-arrow-fat-lines-right"></i>
								<span>Horizontal navigation</span>
							</a>
							<ul class="nav-group-sub collapse" data-submenu-title="Horizontal navigation">
								<li class="nav-item"><a href="navigation_horizontal_styles.html" class="nav-link">Navigation styles</a></li>
								<li class="nav-item"><a href="navigation_horizontal_elements.html" class="nav-link">Navigation elements</a></li>
								<li class="nav-item"><a href="navigation_horizontal_tabs.html" class="nav-link">Tabbed navigation</a></li>
								<li class="nav-item"><a href="navigation_horizontal_disabled.html" class="nav-link">Disabled navigation links</a></li>
								<li class="nav-item"><a href="navigation_horizontal_mega.html" class="nav-link">Horizontal mega menu</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="ph-arrow-elbow-down-right"></i> <span>Menu levels</span></a>
							<ul class="nav-group-sub collapse" data-submenu-title="Menu levels">
								<li class="nav-item"><a href="#" class="nav-link">Second level</a></li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Second level with child</a>
									<ul class="nav-group-sub collapse">
										<li class="nav-item"><a href="#" class="nav-link">Third level</a></li>
										<li class="nav-item nav-item-submenu">
											<a href="#" class="nav-link">Third level with child</a>
											<ul class="nav-group-sub collapse">
												<li class="nav-item"><a href="#" class="nav-link">Fourth level</a></li>
												<li class="nav-item"><a href="#" class="nav-link">Fourth level</a></li>
											</ul>
										</li>
										<li class="nav-item"><a href="#" class="nav-link">Third level</a></li>
									</ul>
								</li>
								<li class="nav-item"><a href="#" class="nav-link">Second level</a></li>
							</ul>
						</li>
						<!-- /layout -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->