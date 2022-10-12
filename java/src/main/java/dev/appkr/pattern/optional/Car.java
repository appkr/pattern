package dev.appkr.pattern.optional;

import java.util.Optional;

public record Car(Optional<Insurance> insurance) {}
