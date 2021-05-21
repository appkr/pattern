package study.mediator2;

import java.util.ArrayList;
import java.util.List;

public class VideoListUI {

  VideoMediator videoMediator;
  List<VideoInfo> videoList = new ArrayList<>();

  int selectedIdx;

  VideoListUI(VideoMediator videoMediator, List<VideoInfo> videoList) {
    this.videoMediator = videoMediator;
    this.videoList = videoList;
  }

  void onSelectedItem(int selectedIdx) {
    if (selectedIdx < videoList.size()) {
      VideoInfo videoInfo = videoList.get(selectedIdx);
      this.selectedIdx = selectedIdx;
      videoMediator.selectVideo(videoInfo);
    }
  }

  void next() {
    if (++this.selectedIdx < videoList.size()) {
      VideoInfo videoInfo = videoList.get(this.selectedIdx);
      videoMediator.selectVideo(videoInfo);
    }
  }

  void prev() {
    if (--this.selectedIdx >= 0) {
      VideoInfo videoInfo = videoList.get(this.selectedIdx);
      videoMediator.selectVideo(videoInfo);
    }
  }
}
