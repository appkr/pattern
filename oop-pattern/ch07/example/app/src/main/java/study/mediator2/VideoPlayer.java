package study.mediator2;

public class VideoPlayer {

  VideoMediator videoMediator;

  VideoInfo currentVideo;
  boolean isPlaying = false;

  void setVideoMediator(VideoMediator videoMediator) {
    this.videoMediator = videoMediator;
  }

  void play(VideoInfo videoInfo) {
    currentVideo = videoInfo;
    isPlaying = true;
    System.out.println("비디오 재생을 시작합니다: " + currentVideo.getTitle());
  }

  void play()
  {
    if (! isPlaying) {
      isPlaying = true;
      System.out.println("비디오 재생을 재개합니다: " + currentVideo.getTitle());
    }
  }

  void pause() {
    if (isPlaying) {
      isPlaying = false;
      System.out.println("비디오 재생을 멈춥니다: " + currentVideo.getTitle());
    }
  }

  void toggle() {
    if (isPlaying) {
      pause();
    } else {
      play();
    }
  }

  void moveTo(int position) {
    System.out.println("비디오 재생 위치를 조정합니다: " + position + "초 위치");
  }



  public VideoInfo getCurrentVideo() {
    return currentVideo;
  }

  public boolean isPlaying() {
    return isPlaying;
  }
}
